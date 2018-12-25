<?php

namespace App\Http\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MyMenuRepository {

    public function getMyMenu() {

        $menu_res = '<ul class="main-menu" id="main-menu">';
        $menu = DB::table('menus as a')
            ->select('a.*')
            ->where('a.parent_menu', '=', NULL)
            //->groupBy('a.id')
            ->orderBy('a.menu_order')
            ->get();

        foreach($menu as $val) {
        	$menu_res .= '<li class="';
        	/*if(strtolower($val->title) == strtolower($request->session->get('main_menu'))) {
				$menu_res .= 'active active opened';
			} else {
				$menu_res .= '';
			}*/

			if(is_null($val->parent_menu) && (is_null($val->menu_url) || $val->menu_url=='' || $val->menu_url=='#')){
                $menu_res .= ' has-sub';
            }
			$menu_res .= '"><a href="'.$val->menu_url.'" class="">';
			if($val->menu_icon){
				$menu_res .= '<i class="fa fa-2x '.$val->menu_icon.'"></i>';
			}

			$menu_res .= '<span class="title">'.$val->title.'</span></a>';

			if(strtolower($val->title) == 'home') {
				$menu_res .= '</li>';
			}

			$sub = DB::table('menus as a')
	            ->select('a.*')
	            ->where('a.parent_menu', '=', $val->id)
	            //->groupBy('a.id')
	            ->orderBy('a.menu_order')
	            ->get();
	        $menu_res .= '<ul>';
	        foreach ($sub as $s) {
				$menu_res .= '<li class="';
				/*if(strtolower($s->title) == strtolower($this->CI->session->userdata('sub_menu'))) {
					$menu_res .= 'active';
				} else {
					$menu_res .= '';
				}*/
				$menu_res .= '"><a href="'.$s->menu_url.'"><span class="title">'.$s->title.'</span></a></li>';
			}
			$menu_res .= '</ul>';
			if(strtolower($val->title) != 'home') {
				$menu_res .= '</li>';
			}
        }

        $menu_res .= '</ul>';
        return $menu_res;
    }

    public function get_menu()
	{
		//$user_type = $this->CI->session->userdata('user_type_id');
		//$user = $this->CI->session->userdata('user_id');
		//$menu = '<ul class="main-menu" id="main-menu">';
		$menu_items  = Menu::get()->toArray();
		$menu_res = $this->html_ordered_menu($menu_items);
		//$menu .= $menu_res;
		//$menu .= '</ul>';
		return $menu_res;
	}

	function ordered_menu($array,$parent_id = 0)
	{
		$temp_array = array();
		foreach($array as $element) {
			if($element['parent_menu']==$parent_id) {
				$element['subs'] = $this->ordered_menu($array,$element['id']);
				$temp_array[] = $element;
			}
		}
		return $temp_array;
	}

	public function html_ordered_menu($array,$parent_id = NULL)
	{
		$menu_html = '';
		if($parent_id == NULL)
			$menu_html .= '<ul class="main-menu" id="main-menu">';
		else
			$menu_html .= '<ul>';
		//$menu_html = '';
		foreach($array as $element) {
			if($element['parent_menu']==$parent_id) {
				$menu_html .= '<li class="';
				if($element['menu_url']!=NULL) {
					$menu_html .= '';
				}
				$menu_html .='"><a href="'.$element['menu_url'].'">';
				if($element['menu_icon']){
					$menu_html .= '<i class="fa fa-2x '.$element['menu_icon'].'"></i>';
				}
				$menu_html .=$element['title'].'</a>';
				$menu_html .= $this->html_ordered_menu($array,$element['id']);
				$menu_html .= '</li>';
			}
		}
		if($parent_id == NULL)
			$menu_html .= '</ul>';
		else
			$menu_html .= '</ul>';
		return $menu_html;
	}

}