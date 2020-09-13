<?php

namespace App\Http\Composers;
use App\Http\Controllers\PasteController;

use Illuminate\Contracts\View\View;

class SidebarComposer {
  public function compose(View $view)
  {
    $pasteController = new PasteController();

    $view->with('listPaste', $pasteController->getPasteByNumber(10))->with('userListPaste', $pasteController->getUserPasteByNumber(10));
  }
}
