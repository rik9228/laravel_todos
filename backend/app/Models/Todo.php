<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'status', 'due_date']; // ユーザー側で自由に変更が効く項目

    /**
     * 状態定義
     */
    const STATUS = [
        1 => ['label_text' => '未着手', 'html_class' => 'btn-danger'],
        2 => ['label_text' => '着手中', 'html_class' => 'btn-primary'],
        3 => ['label_text' => '完了', 'html_class' => 'btn-success'],
    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (empty(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label_text'];
    }

    /**
     * 状態を表すHTMLクラス
     * @return string
     */
    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (empty(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['html_class'];
    }
}
