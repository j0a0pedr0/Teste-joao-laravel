<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Pessoa extends Model
    {
        protected $table = 'tb_pessoa';
        public $timestamps = false;
    }
?>