<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Base extends Model
{

	protected $table = 'product';
	protected $allowedFields = ['status']; // Sesuaikan dengan nama tabel produk di database Anda

	public function data_like($table, $filed, $data)
	{
		return $this->db->table($table)->like($filed, $data)->orderBy('id', 'DESC')->get()->getResultArray();
	}

	public function all_data_order($table, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}

	public function join_table_3($primary_table, $secondary_table, $tertiary_table, $primary_key, $secondary_key, $tertiary_key, $select = '*', $where = null, $order_by = null)
	{
		$builder = $this->db->table($primary_table);
		$builder->select($select);
		$builder->join($secondary_table, "{$secondary_table}.id = {$primary_table}.{$secondary_key}");
		$builder->join($tertiary_table, "{$tertiary_table}.id = {$primary_table}.{$tertiary_key}");
		if ($where) {
			$builder->where($where);
		}
		if ($order_by) {
			$builder->orderBy($order_by);
		}
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function all_data($table, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->orderBy('id', 'DESC')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}

	public function data_where($table, $field, $value)
	{
		return $this->db->table($table)->where($field, $value)->get()->getResultArray();
	}

	public function data_orders_no_duplicate($table, ...$columns)
	{
		$builder = $this->db->table($table);

		foreach ($columns as $column) {
			$builder->select($column);
		}

		$firstColumn = array_shift($columns);
		$builder->groupBy($firstColumn);

		$query = $builder->get();

		return $query->getResultArray();
	}

	public function u_get($key)
	{
		$resault =  $this->db->table('utility')->where('u_key', $key)->get()->getResultArray();
		if ($resault) {
			return $resault[0]['u_value'];
		}

		return null;
	}



	public function data_where_array($table, $data, $order = null)
	{

		if ($order) {
			return $this->db->table($table)->where($data)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($data)->get()->getResultArray();
		}
	}

	public function data_count($table, $where = null)
	{
		if ($where) {
			return $this->db->table($table)->where($where)->countAllResults();
		} else {
			return $this->db->table($table)->countAllResults();
		}
	}
	public function data_insert($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}

	public function upload_file($file, $path, $custome_name = false, $ex = ['png', 'jpeg', 'jpg', 'webp', 'gif'], $get_original = false)
	{
		if ($file) {
			if ($file->getError() == 0) {
				if (in_array(strtolower($file->getClientExtension()), $ex)) {
					if ($custome_name === false) {
						$nama_file = $file->getRandomName();
					} else {
						$nama_file = $custome_name . '.' . $file->getClientExtension();
					}

					$file->move($path, $nama_file);

					if ($get_original) {
						return [
							'name' => $nama_file,
							'original' => $file->getClientName(),
						];
					} else {
						return $nama_file;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	public function data_delete($table, $id)
	{
		return $this->db->table($table)->delete(['id' => $id]);
	}

	public function data_update($table, $data, $id)
	{
		return $this->db->table($table)->set($data)->where('id', $id)->update();
	}


	public function images($file, $path = null)
	{
		if ($file->getError() == 0) {
			if (in_array(strtolower($file->getClientExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
				$name = $file->getRandomName();

				$file->move($path, $name);

				return $name;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function u_update($key, $value)
	{
		return $this->db->table('utility')->set(['u_value' => $value])->where('u_key', $key)->update();
		// return $this->db->table('utility')->set(['u_value' => $value])->where('u_key', $key)->update();
	}

	public function join_table_2($primary_table, $secondary_table, $primary_key, $foreign_key, $select = '*', $where = null, $order_by = null)
	{
		$query = $this->db->table($primary_table);
		$query->select($select);
		$query->join($secondary_table, "{$primary_table}.{$primary_key} = {$secondary_table}.{$foreign_key}", 'left');

		if ($where) {
			$query->where($where);
		}
		if ($order_by) {
			$query->orderBy($order_by);
		}
		return $query->get()->getResultArray();
	}

	public function get_paginated_data_product($table, $search, $offset, $limit = null, $games = null, $provider = null, $status = null, $conditions = null)
	{
		// Inisialisasi query tanpa batasan
		$query = $this->db->table($table . ' p');

		// Jika ada kueri pencarian, tambahkan kondisi pencarian ke dalam kueri



		// Menambahkan filter berdasarkan kondisi yang diberikan
		if (!empty($conditions) && is_array($conditions)) {
			foreach ($conditions as $column => $value) {
				$query->where('p.' . $column, $value);
			}
		}

		if ($table === 'product') {
			$query->join('games g', 'p.games_id = g.id', 'left'); // Gunakan left join agar data 'product' yang tidak cocok tetap terpanggil
			$query->select('p.*, g.games');
			$query->where('p.games_id IS NOT NULL AND g.id IS NOT NULL'); // Memeriksa kesesuaian antara games_id dan id
			$query->orderBy('g.games', 'ASC'); // Mengurutkan berdasarkan kolom 'games' dari tabel 'games'
			$query->orderBy('p.sort', 'ASC');
		}

		if (!empty($search)) {
			// Mendapatkan daftar kolom dalam tabel
			$tableColumns = $this->db->getFieldNames($table);

			// Membangun kondisi pencarian untuk setiap kolom
			$query->groupStart();
			foreach ($tableColumns as $column) {
				$query->orLike('p.' . $column, $search);
			}
			$query->groupEnd();
		}

		if (!empty($games)) {
			$query->where('p.games_id', $games);
		}

		if (!empty($provider)) {
			$query->where('p.provider', $provider);
		}

		if (!empty($status)) {
			$query->where('p.status', $status);
		}

		// Menghitung total data sesuai dengan kondisi pencarian
		$totalRows = $query->countAllResults(false);

		// Batasi hasil sesuai dengan offset dan limit jika limit diberikan
		if (!is_null($limit)) {
			$query->orderBy('p.id', 'DESC')->limit($limit, $offset);
		}

		// Dapatkan data sesuai dengan kondisi pencarian
		$result = $query->get()->getResultArray();

		return array(
			'total' => $totalRows,
			'rows' => $result
		);
	}


	public function getAllGames($search = '', $limit = null, $offset = 0, $sort = 'games', $order = 'asc')
	{
		$builder = $this->db->table('games');
		if (!empty($search)) {
			$builder->like('games', $search);
		}
		// Hitung jumlah produk untuk setiap game
		$builder->select('games.*, (SELECT COUNT(*) FROM product WHERE games_id = games.id) AS product');
		return $builder->orderBy($sort, $order)->limit($limit, $offset)->get()->getResultArray();
	}


	public function countAllGames($search = '')
	{
		$builder = $this->db->table('games');

		if (!empty($search)) {
			$builder->like('games', $search);
		}

		return $builder->countAllResults(); // Return total count of games
	}
}
