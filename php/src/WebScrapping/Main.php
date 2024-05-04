<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;

/**
 * Runner for the Webscrapping exercise.
 */
class Main
{

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void
  {
    $dom = new \DOMDocument('1.0', 'utf-8');
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');
    $papers = [];
    $data = (new Scrapper())->scrap($dom);

    // Write your logic to save the output file bellow.
    print_r($data);

    $xPath = new \DOMXPath($dom);
    $domNodesID = $xPath->query('//div[@class="volume-info"]');
    $titleNodes = $xPath->query('//h4[@class="my-xs paper-title"]');
    $typeNodes = $xPath->query('//div[@class="tags mr-sm"]');
    echo "<pre>";
    print_r($typeNodes);
    echo "</pre>";
  }
}
