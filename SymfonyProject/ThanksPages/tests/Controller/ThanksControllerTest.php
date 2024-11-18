<?php

namespace App\Test\Controller;

use App\Entity\Thanks;
use App\Repository\ThanksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ThanksControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ThanksRepository $repository;
    private string $path = '/thanks/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Thanks::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Thank index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'thank[Text]' => 'Testing',
            'thank[TkDate]' => 'Testing',
            'thank[TksBy]' => 'Testing',
            'thank[TksFor]' => 'Testing',
        ]);

        self::assertResponseRedirects('/thanks/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Thanks();
        $fixture->setText('My Title');
        $fixture->setTkDate('My Title');
        $fixture->setTksBy('My Title');
        $fixture->setTksFor('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Thank');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Thanks();
        $fixture->setText('My Title');
        $fixture->setTkDate('My Title');
        $fixture->setTksBy('My Title');
        $fixture->setTksFor('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'thank[Text]' => 'Something New',
            'thank[TkDate]' => 'Something New',
            'thank[TksBy]' => 'Something New',
            'thank[TksFor]' => 'Something New',
        ]);

        self::assertResponseRedirects('/thanks/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getText());
        self::assertSame('Something New', $fixture[0]->getTkDate());
        self::assertSame('Something New', $fixture[0]->getTksBy());
        self::assertSame('Something New', $fixture[0]->getTksFor());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Thanks();
        $fixture->setText('My Title');
        $fixture->setTkDate('My Title');
        $fixture->setTksBy('My Title');
        $fixture->setTksFor('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/thanks/');
    }
}
