<?php
/**
 * Created by PhpStorm.
 * User: waviq
 * Date: 8/19/2015
 * Time: 2:27 PM
 */

namespace App\Repository;


use App\Kategori;

class KategoriReposiotry {

    protected $kategori;

    public function __construct(Kategori $kategori)
    {
        $this->kategori = $kategori;
    }

    public function all()
    {
        return $this->kategori->all();
    }

    public function getAllSelect()
    {
        $select = $this->all()->lists('namaKategori','id');

        return compact('select');
    }
}