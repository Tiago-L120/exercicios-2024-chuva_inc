<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {

    $xPath = new \DOMXPath($dom);
    $domNodesID = $xPath->query('//div[@class="volume-info"]');
    $titleNodes = $xPath->query('//h4[@class="my-xs paper-title"]');
    $typeNodes = $xPath->query('//div[@class="tags mr-sm"]');
    $authorsNodes = $xPath->query('//div[@class="authors"]');
    $authorsNodes = $xPath->query('//div[@class="authors"]');
    $authorsInstitutions = $xPath->query('//div[@class="authors"]/span');
   /*  $authors = [];

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
  } */
  
    return [
      new Paper(
        123,
        'The Nobel Prize in Physiology or Medicine 2023',
        'Nobel Prize',
        [
          new Person('Katalin Karikó', 'Szeged University'),
          new Person('Drew Weissman', 'University of Pennsylvania'),
        ]
      ),
    ];
  }

}
