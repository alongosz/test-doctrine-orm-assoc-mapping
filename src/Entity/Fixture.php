<?php
/**
 * Copyright (c) 2017, Andrew Longosz
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fixture.
 *
 * @ORM\Entity
 * @ORM\Table(name="fixture")
 */
class Fixture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \App\Entity\Tournament
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Tournament", inversedBy="fixtures")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id", nullable=false)
     */
    private $tournament;

    /**
     * @var int
     *
     * @ORM\Column(name="no", type="integer")
     */
    private $no;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set no.
     *
     * @param int $no
     *
     * @return Fixture
     */
    public function setNo($no)
    {
        $this->no = $no;

        return $this;
    }

    /**
     * Get no.
     *
     * @return int
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * @param \App\Entity\Tournament $tournament
     * @param int $fixtureNo consecutive Fixture number, an integer greater than 0
     */
    public function __construct(Tournament $tournament = null, $fixtureNo = null)
    {
        $this->no = $fixtureNo;
        $this->tournament = $tournament;
    }

    /**
     * Set tournament.
     *
     * @param \App\Entity\Tournament $tournament
     *
     * @return Fixture
     */
    public function setTournament(Tournament $tournament)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament.
     *
     * @return \App\Entity\Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }
}
