// Import database
const db = require("../config/database");

// Membuat class Model Student
class Student {
  /**
   * Membuat method static all untuk mengambil semua data siswa.
   */
  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students";
      db.query(sql, (err, results) => {
        if (err) {
          return reject(err); // Menangani error
        }
        resolve(results);
      });
    });
  }

  /**
   * Fungsi untuk insert data siswa.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data siswa yang baru diinsert.
   */
  static create(data) {
    return new Promise((resolve, reject) => {
      const sql = "INSERT INTO students (nama, nim, email, jurusan) VALUES (?, ?, ?, ?)";
      // Menggunakan parameter untuk mencegah SQL Injection
      const params = [data.nama, data.nim, data.email, data.jurusan];

      db.query(sql, params, (err, results) => {
        if (err) {
          return reject(err); // Menangani error
        }
        // Mengembalikan data siswa yang baru diinsert
        const newStudent = {
          id: results.insertId, // ID yang dihasilkan dari insert
          ...data // Menyertakan data yang diinsert
        };
        resolve(newStudent);
      });
    });
  }
}

// Export class Student
module.exports = Student;