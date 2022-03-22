<?php


namespace App\Services;

use App\Model\Character;
use \Psr\Http\Client\ClientInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class RMProvider
{
    protected ?ClientInterface $client;
    protected ?ContainerInterface $container;
    protected ?SerializerInterface $serializer;
    protected string $url;

    public function __construct(ClientInterface $client, Serializer $serializer, ContainerInterface $container)
    {
        $this->client = $client;
        $this->container = $container;
        $this->serializer = $serializer;
        $this->url = $container->getParameter('api_rm_base_url');
    }

    public function getCharacter(int $id): ?Character
    {
        try {

            /** @var Response $response */
            $response = $this->client->request('GET', \sprintf('%s%s/%s', $this->url, 'character', $id));

            if (Response::HTTP_OK === $response->getStatusCode()) {
                return $this->serializer->deserialize($response->getBody()->getContents(), Character::class, 'json');
            }

        } catch (\Exception $exception) {
            return null;
        }


    }
}