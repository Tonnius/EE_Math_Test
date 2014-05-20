<?php

class UikitPresenter extends Illuminate\Pagination\Presenter {

    public function getActivePageWrapper($text)
    {
        return '<li class="uk-active"><span>'.$text.'</span></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="uk-disabled"><span>'.$text.'</span></li>';
    }

    public function getPageLinkWrapper($url, $page)
    {
        return '<li><a href="'.$url.'">'.$page.'</a></li>';
    }

}
