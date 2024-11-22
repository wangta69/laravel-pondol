<?php

namespace Pondol\Common\Models;

use Illuminate\Database\Eloquent\Model;


class JsonKeyValue extends Model
{

  protected $fillable = ['key', 'value'];

  const CREATED_AT = null;
  const UPDATED_AT = null;
}
