<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // この定義を追加することで一括割当することができる(コンストラクタで自動的に設定される)
    protected $fillable = [
        'title',
        'url',
        'description'
    ];
    // 一括割当を避けるなら個別に代入する。
    // $link = new \App\Link;
    // $link->title = $data['title'];
    // $link->url = $data['url'];
    // $link->description = $data['description'];
}
