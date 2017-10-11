<?php
/**
 * Copyright (c) 2017, Andrew Longosz
 */

namespace App\Tests\Entity\Persistence;

use App\Entity\Fixture;
use App\Entity\Tournament;

class TournamentBrokenTest extends BasePersistenceTest
{
    public function testGeneratingFixtures()
    {
        $tournament = $this->createTournament();
        $fixtures = $this->generateFixtures($tournament);

        foreach ($fixtures as $fixture) {
            self::$entityManager->persist($fixture);
        }
        self::$entityManager->flush();

        $tournamentRepository = self::$entityManager->getRepository(Tournament::class);

        $loadedTournament = $tournamentRepository->find(['id' => $tournament]);
        self::assertEquals(count($fixtures), $loadedTournament->getFixtures()->count());
    }

    /**
     * @return \App\Entity\Tournament
     */
    protected function createTournament()
    {
        $tournament = new Tournament();

        $tournament->setName('Tournament 01');
        $tournament->setBeginsAt(new \DateTime());
        $tournament->setEndsAt($tournament->getBeginsAt()->add(new \DateInterval('P1M')));
        $tournament->setPointsForWin(3);
        $tournament->setPointsForTie(1);

        self::$entityManager->persist($tournament);
        self::$entityManager->flush();

        return $tournament;
    }

    /**
     * @param int $no
     * @param \App\Entity\Tournament $tournament
     *
     * @return \App\Entity\Fixture
     */
    private function createFixture($no, Tournament $tournament)
    {
        $fixture = new Fixture();
        $fixture->setNo($no);
        $fixture->setTournament($tournament);

        return $fixture;
    }

    /**
     * @param \App\Entity\Tournament $tournament
     *
     * @return \App\Entity\Fixture[]
     */
    private function generateFixtures(Tournament $tournament)
    {
        $fixtures = [];
        for ($i = 0; $i < 3; ++$i) {
            $fixtures[] = $this->createFixture($i + 1, $tournament);
        }

        return $fixtures;
    }
}
