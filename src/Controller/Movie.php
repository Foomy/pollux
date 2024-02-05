<?php

namespace App\Controller;

use App\Database;
use App\DataTransfer\Movie as MovieDto;
use App\Router;
use JsonException;

class Movie
{
    /**
     * @throws JsonException
     */
    public function index($uuid = null): void
    {
        $db = Database::create();

        $sql = <<<SQL
            SELECT p.id
            FROM `publication` as `p`
            INNER JOIN `publication_type` AS `pt` ON (`p`.`publication_type_id` = `pt`.`id`)
            WHERE `pt`.`typename` = :typename
            %s;
        SQL;

        if (null !== $uuid) {
            $sql = sprintf($sql, 'AND p.id = :publicationId');
        } else {
            $sql = sprintf($sql, '');
        }

        $data['typename'] = 'movie';
        if (null !== $uuid) {
            $data['publicationId'] = $uuid;
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        $publications = $stmt->fetchAll($db::FETCH_OBJ);

        $movies = [];
        foreach ($publications as $publication) {
            $movie = new MovieDto($publication->id);

            $sql = <<<SQL
                SELECT `mk`.`keyname`  AS `key`,
                       `mv`.`value`    AS `value`
                FROM `metavalue` AS `mv`
                INNER JOIN `metakey` AS `mk` ON (`mv`.`metakey_id` = `mk`.`id`)
                WHERE mv.publication_id = :publicationId;
            SQL;

            $stmt = $db->prepare($sql);
            $stmt->execute([
                'publicationId' => $publication->id,
            ]);
            $result = $stmt->fetchAll($db::FETCH_OBJ);

            $data = [];
            foreach ($result as $item) {
                $data[$item->key] = $item->value;
            }

            $movie->exchangeArray($data);
            $movies[] = $movie;
        }

        $response['links'] = [
            'self' => Router::HOST . $_SERVER['REQUEST_URI'],
        ];

        $response['data'] = $movies;

        header('Content-Type: application/vnd.api+json');
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }
}