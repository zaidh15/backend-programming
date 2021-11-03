<?php

# membuat class Animal
class Animal
{
  # property animals
  public $animals; 

  # method constructor - mengisi data awal
  # parameter: data hewan (array)
  public function __construct($animal)
  {
    $this->animals = $animal;
  }

  # method index - menampilkan data animals
  public function index()
  {
    # gunakan foreach untuk menampilkan data animals (array)
    foreach ($this->animals as $animal) {
      echo "Nama Hewan : $animal" . PHP_EOL;
    }
  }

  # method store - menambahkan hewan baru
  # parameter: hewan baru
  public function store($newAnimal)
  {
    # gunakan method array_push untuk menambahkan data baru
    array_push($this->animals, $newAnimal);
  }

  # method update - mengupdate hewan
  # parameter: index dan hewan baru
  public function update($index, $newAnimal)
  {
    $this->animals[$index] = $newAnimal;
  }

  # method delete - menghapus hewan
  # parameter: index
  public function destroy($index)
  {
    # gunakan method unset atau array_splice untuk menghapus data array
    array_splice($this->animals, $index, 1);
  }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(["Kadal", "Singa"]);

echo "Index - Menampilkan seluruh hewan" . PHP_EOL;
$animal->index();
// echo "<br>";

echo "Store - Menambahkan hewan baru" . PHP_EOL;
$animal->store('burung');
$animal->index();
// echo "<br>";

echo "Update - Mengupdate hewan" . PHP_EOL;
$animal->update(0, 'Kucing Anggora');
$animal->index();
// echo "<br>";

echo "Destroy - Menghapus hewan" . PHP_EOL;
$animal->destroy(1);
$animal->index();
// echo "<br>";