<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use App\Models\Expirations;
use App\Models\Syntax;
use Carbon\Carbon;

class PasteController extends Controller
{
  private $errors;

  private function getPasteLive($id)
  {
    $Expir = Expirations::find($id);
    $tmpDate = null;
    $date = Carbon::now();
    switch ($Expir->type_term) {
      case null:
        break;
      case 'm':
          $tmpDate = $date->addMinutes($Expir->term);
          break;
      case 'H':
          $tmpDate = $date->addHours($Expir->term);
          break;
      case 'D':
          $tmpDate = $date->addDays($Expir->term); ;
          break;
      case 'W':
          $tmpDate = $date->addWeeks($Expir->term);
          break;
      case 'M':
          $tmpDate = $date->addMonths($Expir->term);
          break;
        }
      return $tmpDate;
  }

  private function getCacheString($length)
  {
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    do {
      $cacheString = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);

    } while (empty(Paste::where('url','=',$cacheString)->
                   where(function($query) {
                     $date = Carbon::now();
                     $query->where('paste_live','>=',$date)->
                     orWhere('paste_live','=',null);
                   })->get()));
    return $cacheString;
  }

  public function create()
  {
    return view('home',['expirations' => Expirations::all(), 'syntaxes' => Syntax::all()]);
  }

  public function store(PasteRequest $req)
  {
    $id_user = 0;
    if (auth()->check())
    {
      $id_user = auth()->user()->id;
    }
    $paste = new Paste;
    $paste->id_user = $id_user;
    $paste->id_syntax = $req->id_syntax;
    $paste->paste = $req->paste;
    $paste->id_expiration = $req->id_expiration;
    $paste->exposure = $req->exposure;
    $paste->name = $req->name;
    $paste->url = $this->getCacheString(6);
    $paste->paste_live = $this->getPasteLive($req->id_expiration);

    $paste->save();

    return redirect()->home()->with('success', 'Паста была добавлена, ссылка на пасту: http://localhost:8000/paste/' . $paste->url);
  }

  public static function showPasteOne($cacheString)
  {
    return view('paste-view', [
                              'pasteData' => DB::table('pastes')->select('pastes.id',
                                                                        'pastes.id_user',
                                                                        'pastes.name',
                                                                        'pastes.paste',
                                                                        'pastes.created_at',
                                                                        'syntaxes.code_name')->
                                                  join('syntaxes','pastes.id_syntax','syntaxes.id')
                                                  ->where('url','=',$cacheString)->
                                                    where(function($query) {
                                                                          $date = Carbon::now();
                                                                          $query->where('paste_live','>=',$date)->orWhere('paste_live','=',null);
                                                    })->
                                                    where(function($query) {
                                                      if (!auth()->check())
                                                      {
                                                        $query->where('exposure','<=', 2);
                                                      }
                                                    })->
                                                    first()
            ]);
  }

  public function getPasteByNumber($count)
  {
    return Paste::select('pastes.url', 'pastes.name', 'pastes.created_at', 'syntaxes.caption')->
                  join('syntaxes','pastes.id_syntax','syntaxes.id')->
                  where('pastes.exposure',1)->
                  where(function($query) {
                                          $date = Carbon::now();
                                          $query->where('pastes.paste_live','>=',$date)->
                                          orWhere('pastes.paste_live',null);
                                        })->
                  orderBy('pastes.created_at','desc')->get();
  }

  public function getUserPasteByNumber($count)
  {
    if (!auth()->check())
    {
      return null;
    }
    return Paste::select('pastes.url', 'pastes.name', 'pastes.created_at', 'syntaxes.caption')->
                  join('syntaxes','pastes.id_syntax','syntaxes.id')->
                  where('pastes.id_user', auth()->user()->id)->
                  where(function($query) {
                                          $date = Carbon::now();
                                          $query->where('pastes.paste_live','>=',$date)->
                                          orWhere('pastes.paste_live',null);
                                        })->
                  orderBy('pastes.created_at','desc')->get();
  }

  private function verifyPasteBeforeUpdate($id)
  {
    if (!auth()->check())
    {
      $this->errors = 'Редактировать пасты может только зарегистрированный пользователь';
      return null;
    }

    $pasteData = Paste::where('id', $id)->first();

    if (isset($pasteData))
    {
      if ($pasteData->id_user != auth()->user()->id)
      {
        $this->errors = 'Редактировать можно только свои пасты';
        return null;
      }
    }

    return $pasteData;
  }

  public function updatePasteView($id)
  {
    $pasteData = $this->verifyPasteBeforeUpdate($id);
    if (!isset($pasteData))
    {
      return redirect()->home()->with('error', $this->errors);
    }

    return view('paste-update', ['expirations' => Expirations::all(), 'syntaxes' => Syntax::all(), 'pasteData' => $pasteData]);

  }

  public function updatePaste($id, PasteRequest $req)
  {
    $pasteData = $this->verifyPasteBeforeUpdate($id);
    if (!isset($pasteData))
    {
      return redirect()->home()->with('error', $this->errors);
    }

    $paste = Paste::find($id);
    $paste->id_syntax = $req->id_syntax;
    $paste->paste = $req->paste;
    $paste->id_expiration = $req->id_expiration;
    $paste->exposure = $req->exposure;
    $paste->name = $req->name;
    $paste->paste_live = $this->getPasteLive($req->id_expiration);

    $paste->save();

    return $this->showPasteOne($paste->url);

    //return redirect()->home()->with('success', 'Паста была сохранена');
  }

  public function deletePaste($id)
  {

  }
}
