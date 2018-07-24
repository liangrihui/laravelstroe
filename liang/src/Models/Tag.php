<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 8:50
 */

namespace Liang\Models;


class Tag extends BaseModel
{
    protected $fillable = ['name','frequency'];


    public  function addTags($tags){
        $tags = $this->str_array($tags);
//        $model = new static();
        foreach ($tags as $tag){
            $ta = $this->where('name','=',$tag)->first();
            if ($this->where('name','=',$tag)->count() >0){
                $ta->frequency +=1;
                $ta->save();
            }else{
                $this->create(['name'=>$tag, 'frequency'=>1]);
            }
        }
    }

    public  function removeTags($tags){
        $tags = $this->str_array($tags);

        foreach ($tags as $tag){
            $ta = $this->where('name','=',$tag)->first();
            if ($ta->frequency >1){
                $ta->frequency -=1;
                $ta->save();
            }else{
                $ta->delete();
            }
        }
    }

    public  static function str_array($tags){
        return preg_split('/\s*,|，\s*/',$tags);
    }

    public  function allTag($limit = 15){
//        $model = new static();
        $tags = $this->orderby('frequency', 'desc')->limit($limit)->get();
//        $tags = $this->orderby('frequency', 'desc')->limit($limit+1)->pluck('name','frequency');
        return $tags;

    }

    public function tagtunVag($limit = 15){
        $avg =  $this->orderby('frequency', 'desc')->limit($limit)->avg('frequency');
            return $avg;
    }

}