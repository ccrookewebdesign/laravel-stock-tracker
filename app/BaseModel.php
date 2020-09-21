<?php

namespace App;

/*use App\Traits\Encryptable;
use App\Traits\ExportsArrayForTest;
use App\Traits\GeneratesHashToken;
use App\Traits\UpdateFromEditor;*/
use Carbon\Carbon;
// use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * All models (except User) inherit from this base class.
 *
 * @package App
 * @property Carbon created_at
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Model {

  // use Encryptable, GeneratesHashToken, ExportsArrayForTest, UpdateFromEditor;

  protected $guarded = [];  // Disable mass-assignment checking

  protected $encrypted = [];

  protected $visible = ['id'];

  /*protected function getArrayField($field){
    if(in_array($field, $this->encrypted, true)){
      $cipherText = $this->attributes[$field] ?? null;
      return $cipherText === null ? [] : json_decode_array(Crypt::decrypt($cipherText));
    }
    return json_decode_array($this->attributes[$field] ?? []);
  }

  public function updateArrayField($key_name, $key_value, $field = 'details'){
    $arr = $this->getArrayField($field);

    $arr[$key_name] = $key_value;

    return $this->update([$field => $arr]);
  }*/

  /*public function toArray(){
    $arr = parent::toArray();

    $vars = array_merge($this->getVisible(), $this->appends);
    if(($this->visibleFull ?? null) === true){
      if(count($this->encrypted) > 0){
        throw new \Exception('visibleFull cannot be used with encrypted fields');
      }
      $localizedFieldsNotHidden = [];
      foreach(($this->localizedFields ?? []) as $field){
        if(in_array($field, $this->getHidden(), true) === false){
          $localizedFieldsNotHidden[] = $field;
        }
      }
      $vars = array_merge($vars, array_keys($this->attributes), $localizedFieldsNotHidden);
    }

    foreach($vars as $colName){
      if(!isset($arr[$colName])){
        $arr[$colName] = $this->$colName;
      }
    }

    return $arr;
  }

  public function getDescriptiveNameAttribute(){
    return '-';
  }

  protected function serializeDate(DateTimeInterface $date){
    return $date->format('Y-m-d H:i:s');
  }*/
}
