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
    $authorsNodes = $xPath->query('//div[@class="authors"]');
    $authorsNodes = $xPath->query('//div[@class="authors"]');
    $authorsInstitutions = $xPath->query('//div[@class="authors"]/span');
    $authors = [];

    $authorGroups = $xPath->query('//div[@class="authors"]');
    foreach ($authorGroups as $group) {
      $groupAuthors = [];
      $authorNodes = $group->getElementsByTagName('span');
      foreach ($authorNodes as $authorNode) {
        $author = [
          'Author' => $authorNode->textContent,
          'Instituiton' => $authorNode->getAttribute('title')
        ];
        $groupAuthors[] = $author;
      }
      $authors[] = $groupAuthors;
    }

    print_r($authors);
  }
}
