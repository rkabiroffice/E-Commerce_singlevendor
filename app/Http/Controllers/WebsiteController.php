<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class WebsiteController extends Controller
{
	public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:header_setup'])->only('header');
        $this->middleware(['permission:footer_setup'])->only('footer');
        $this->middleware(['permission:view_all_website_pages'])->only('pages');
        $this->middleware(['permission:website_appearance'])->only('appearance');
    }

	public function header(Request $request)
	{
		return view('backend.website_settings.header');
	}
	public function footer(Request $request)
	{
		$lang = $request->input('lang');
		if ($lang === null) {
			$lang = Language::where('code', env('DEFAULT_LANGUAGE'))->value('code')
				?? Language::query()->value('code');
		}
		return view('backend.website_settings.footer', compact('lang'));
	}
	public function pages(Request $request)
	{
		return view('backend.website_settings.pages.index');
	}
	public function appearance(Request $request)
	{
		return view('backend.website_settings.appearance');
	}
}
