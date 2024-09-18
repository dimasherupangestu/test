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
}
