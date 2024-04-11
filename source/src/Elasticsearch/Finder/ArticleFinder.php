<?php

namespace App\Elasticsearch\Finder;

use App\Entity\Article;
use Elastica\Document;
use Elastica\Query;
use Elastica\Result;
use FOS\ElasticaBundle\Elastica\Index;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use FOS\ElasticaBundle\Finder\TransformedFinder;

class ArticleFinder
{
    public function __construct(private readonly Index $finder)
    {
    }

    /**
     * @return Article[]
     */
    public function findArticles(): array
    {
        $query = new Query(new Query\MatchAll());

        $result = $this->finder->search($query);

        return $result->getResults();
    }

    public function updateDocument(int $identifier, array $newData): void
    {
        $document = $this->findOneByIdentifier($identifier);
        if (null === $document) {
            return;
        }

        $elasticDocument = new Document($document->getId(), $newData, 'articles');

        $this->finder->updateDocument($elasticDocument);
    }

    public function findOneByIdentifier(int $identifier): ?Document
    {
        $query = new Query(new Query\MatchQuery('name', 'Edited - Provident veniam voluptatibus est aperiam illo eligendi a facere.'));

        $result = $this->finder->search($query);

        return $result->getTotalHits() === 1 ? $result->getDocuments()[0] : null;
    }
}