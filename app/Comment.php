<?php

namespace App;

use Carbon\Carbon;

/**
 * Class Comment
 *
 * @package App
 * @property int id
 * @property string body
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Comment extends BaseModel {

    public function boomDaddy(){
        dd(Carbon::tomorrow());
        return 'yes';
    }

}
