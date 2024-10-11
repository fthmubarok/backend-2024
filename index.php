<?php
class Animal {
    // Property untuk menyimpan data hewan
    public $animals = [];

    // Constructor untuk mengisi data awal hewan
    public function __construct($data) {
        $this->animals = $data;
    }

    // Method untuk menampilkan seluruh data hewan (index)
    public function index() {
        echo "Index - Menampilkan seluruh hewan:\n";
        foreach ($this->animals as $index => $animal) {
            echo "- {$animal}\n";
        }
    }

    // Method untuk menambahkan hewan baru (store)
    public function store($data) {
        array_push($this->animals, $data);
        echo "Store - Menambahkan hewan baru ({$data}):\n";
    }

    // Method untuk memperbarui data hewan (update)
    public function update($index, $data) {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            echo "Update - Mengupdate hewan di index {$index} menjadi {$data}:\n";
        } else {
            echo "Update - Index {$index} tidak ditemukan.\n";
        }
    }

    // Method untuk menghapus hewan (destroy)
    public function destroy($index) {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            echo "Destroy - Menghapus hewan di index {$index}:\n";
        } else {
            echo "Destroy - Index {$index} tidak ditemukan.\n";
        }
    }
}

// Membuat object Animal dan mengisi data awal
$animal = new Animal(["Ayam", "Ikan"]);

// Menampilkan seluruh hewan
$animal->index();
echo "<br>";

// Menambahkan hewan baru
$animal->store("Burung");
$animal->index();
echo "<br>";

// Mengupdate hewan pada index tertentu
$animal->update(0, "Kucing Anggora");
$animal->index();
echo "<br>";

// Menghapus hewan dari index tertentu
$animal->destroy(1);
$animal->index();
?>
