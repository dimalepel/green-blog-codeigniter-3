<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('news_model');

    $this->load->library('session');
    $this->load->library('pagination');

    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('custom_helper');
  }

  public function index($offset = 0, $order_by = 'title', $sort_order = 'asc')
  {
    $data['title'] = 'Новости';
    $data['meta_title'] = $data['title'];
    $data['meta_description'] = 'Архив новостей';

    $search_key = $this->input->post('search_key');

    $this->session->sess_destroy();

    // Set session
    if($this->uri->segment('4') != NULL ){
      $this->session->set_userdata(array("order_by" => $order_by));
      $this->session->set_userdata(array("sort_order" => $sort_order));
    }else{
      if($this->session->userdata('order_by') != NULL){
        $order_by = $this->session->userdata('order_by');
        $sort_order = $this->session->userdata('sort_order');
      }
    }

    $config['base_url'] = base_url() . "news";
    $config['total_rows'] = $this->news_model->getCountNews();
    $config['per_page'] = 5; // количество новостей на страницу
    //$config['uri_segment'] = 2;
    $config['num_links'] = 2;
    $config['use_page_numbers'] = TRUE;

    // Разметка пагинации
    $config['full_tag_open'] = '<div class="pagination">';
    $config['full_tag_close'] = '</div>';

    $config['next_link'] = FALSE;
    $config['prev_link'] = FALSE;
    $config['last_link'] = '<img class="pagination__icon" src="/assets/images/icon-next.png">';
    $config['last_tag_open'] = '<span class="pagination__item pagination__item--control pagination__item--next">';
    $config['last_tag_close'] = '</span>';
    $config['first_link'] = '<img class="pagination__icon" src="/assets/images/icon-prev.png">';
    $config['first_tag_open'] = '<span class="pagination__item pagination__item--control pagination__item--prev">';
    $config['first_tag_close'] = '</span>';
    $config['cur_tag_open'] = '<span class="pagination__item pagination__item--num current">';
    $config['cur_tag_close'] = '</span>';
    $config['num_tag_open'] = '<span class="pagination__item pagination__item--num">';
    $config['num_tag_close'] = '</span>';

    $this->pagination->initialize($config);

    $page = $this->uri->segment(2, 1);
    $offset = ($page - 1) * $config['per_page'];

    $data['search_key'] = $search_key;
    $data['order_by'] = $order_by;
    $data['sort_order'] = $sort_order;

    if ($search_key) {
      $data['news'] = $this->news_model->getNewsInPages(99, $offset, $order_by, $sort_order, $search_key);
    } else {
      $data['pagination'] = $this->pagination->create_links();

      $data['news'] = $this->news_model->getNewsInPages($config['per_page'], $offset, $order_by, $sort_order, $search_key);
    }

    $this->load->view('blocks/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('blocks/footer');
  }

  public function view($slug = NULL)
  {
    $data['news_item'] = $this->news_model->getSingleNews($slug);
    $data['news_recommended'] = $this->news_model->getRecommendedNews(2, $data['news_item']['id']);

    if(empty($data['news_item']))
    {
      show_404();
    }

    $data['meta_title'] = $data['news_item']['meta_title'];
    $data['meta_description'] = $data['news_item']['meta_description'];

    $data['title'] = $data['news_item']['title'];
    $data['thumb_url'] = $data['news_item']['thumb_url'];
    $data['pub_date'] = setDateTimeFormat($data['news_item']['pub_date'], 'Y-m-d h:i:s', 'd / m / Y');
    $data['description'] = $data['news_item']['description'];
    $data['text'] = $data['news_item']['text'];

    $this->load->view('blocks/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('blocks/footer');
  }

  public function display_xml() {
    //$this->load->dbutil();

    $news_data = $this->news_model->getNews();

    $this->output->set_content_type('text/xml');

    $dom = new DOMDocument('1.0');

    $root = $dom->createElement('news');
    $dom->appendChild($root);

    foreach ($news_data as $value) {
      $new = $dom->createElement('new');
      $root->appendChild($new);

      $id = $dom->createAttribute('id');
      $new->appendChild($id);

      $idValue = $dom->createTextNode($value['id']);
      $id->appendChild($idValue);

      $title = $dom->createElement('title');
      $new->appendChild($title);

      $titleValue = $dom->createTextNode($value['title']);
      $title->appendChild($titleValue);

      $url = $dom->createElement('url');
      $new->appendChild($url);

      $urlValue = $dom->createTextNode('/news/article/' . $value['slug']);
      $url->appendChild($urlValue);

      $pub_date = $dom->createElement('pub_date');
      $new->appendChild($pub_date);

      $dateValue = $dom->createTextNode(setDateTimeFormat($value['pub_date'], 'Y-m-d H:i:s', 'd.m.Y H:i'));
      $pub_date->appendChild($dateValue);

      $description = $dom->createElement('description');
      $new->appendChild($description);

      $descriptionValue = $dom->createTextNode($value['description']);
      $description->appendChild($descriptionValue);

      $text = $dom->createElement('text');
      $new->appendChild($text);

      $textValue = $dom->createTextNode(strip_tags($value['text']));
      $text->appendChild($textValue);

      $meta_title = $dom->createElement('meta_title');
      $new->appendChild($meta_title);

      $meta_titleValue = $dom->createTextNode($value['meta_title']);
      $meta_title->appendChild($meta_titleValue);

      $meta_description = $dom->createElement('meta_description');
      $new->appendChild($meta_description);

      $meta_descriptionValue = $dom->createTextNode($value['meta_description']);
      $meta_description->appendChild($meta_descriptionValue);
    }

    echo $dom->saveXML();
  }
}
