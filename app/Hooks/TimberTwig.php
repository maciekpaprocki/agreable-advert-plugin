<?php namespace AgreableAdvertPlugin\Hooks;

use add_filter;
use Twig_SimpleFunction;
use stdClass;

class TimberTwig {

  public function init() {
    add_filter('get_twig', array($this, 'add_to_twig'), 10);
    add_filter('timber/loader/paths', array($this, 'add_timber_paths'));
  }

  public function add_to_twig($twig) {
    $twig->addFunction(
      new Twig_SimpleFunction('get_advert_data',
        array('AgreableAdvertPlugin\Services\AdvertSlotGenerator', 'get_advert_data')));

    $twig->addFunction(
      new Twig_SimpleFunction('get_advert_html',
        array('AgreableAdvertPlugin\Services\AdvertSlotGenerator', 'get_advert_html')));

    $twig->addFunction(
      new Twig_SimpleFunction('get_adverts_page_setup_html',
        array('AgreableAdvertPlugin\Services\AdvertSlotGenerator', 'get_adverts_page_setup_html')));

    return $twig;
  }

  public function add_timber_paths($paths){
    $herbert_config = include __DIR__ . '/../../herbert.config.php';

    array_push($paths, ['AgreableAdvertPlugin' => __DIR__ . '/../../resources/views']);
    return $paths;
  }
}
