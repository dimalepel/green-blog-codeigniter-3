<?php

class News_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Вывод новостей с параметрами
  public function getNewsInPages($limit, $start, $order_by = 'title', $sort_order = 'asc', $searchKey = '') {
    $query = $this->db
      ->like('title', $searchKey)
      ->order_by($order_by, $sort_order)
      ->limit($limit, $start)
      ->get('news');

    return $query->result_array();
  }

  // Общее количество новостей
  public function getCountNews() {
    return $this->db->count_all('news');
  }

  // Получаем одиночную новость по слагу
  public function getSingleNews($slug) {
    $query = $this->db->get_where('news', array('slug' => $slug));
    return $query->row_array();
  }

  // Рекомендованные новости
  public function getRecommendedNews($limit = 2, $id) {
    $query = $this->db
      ->where_not_in('id', $id)
      ->order_by('date', 'RANDOM')
      ->limit($limit)
      ->get('news');

    return $query->result_array();
  }

  // Базовый вывод новостей
  public function getNews($slug = FALSE)
  {
    if($slug === FALSE)
    {
      $query = $this->db->get('news');
      return $query->result_array();
    }

    $query = $this->db->get_where('news', array('slug' => $slug));
    return $query->row_array();
  }

}
