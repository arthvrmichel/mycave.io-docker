<?php

namespace App\Service;

use App\Entity\Console;
use App\Entity\Edition;
use App\Entity\Game;
use App\Entity\Platform;
use App\Entity\PreservationState;
use App\Entity\User;
use App\Entity\Version;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DatabasePopulator
{
    private const DATE_FORMAT = 'd/m/Y';

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    public function populate(): void
    {
        $palVersion = new Version();
        $palVersion->setName('PAL');
        $this->entityManager->persist($palVersion);

        $asianVersion = new Version();
        $asianVersion->setName('NTSC JP');
        $this->entityManager->persist($asianVersion);

        $americanVersion = new Version();
        $americanVersion->setName('NTSC');
        $this->entityManager->persist($americanVersion);

        $standardEdition = new Edition();
        $standardEdition->setName('Standard');
        $this->entityManager->persist($standardEdition);

        $collectorEdition = new Edition();
        $collectorEdition->setName('Collector');
        $this->entityManager->persist($collectorEdition);

        $specialEdition = new Edition();
        $specialEdition->setName('Special');
        $this->entityManager->persist($specialEdition);

        $new = new PreservationState();
        $new->setName('New');
        $this->entityManager->persist($new);

        $veryGood = new PreservationState();
        $veryGood->setName('Very good');
        $this->entityManager->persist($veryGood);

        $good = new PreservationState();
        $good->setName('Good');
        $this->entityManager->persist($good);

        $average = new PreservationState();
        $average->setName('Average');
        $this->entityManager->persist($average);

        $bad = new PreservationState();
        $bad->setName('Bad');
        $this->entityManager->persist($bad);

        $platformPS5 = new Platform();
        $platformPS5->setName('PlayStation 5')
            ->setAbbreviation('PS5');
        $this->entityManager->persist($platformPS5);

        $ps5Standard = new Console();
        $ps5Standard->setName('PlayStation 5 Standard Edition')
            ->setPlatform($platformPS5)
            ->setBuyingPrice(49999)
            ->setBuyingDate(DateTime::createFromFormat(self::DATE_FORMAT, '17/09/2020'))
            ->setReleaseDate(DateTime::createFromFormat(self::DATE_FORMAT, '19/11/2020'));
        $this->entityManager->persist($ps5Standard);

        $ghostOfTsushima = new Game();
        $ghostOfTsushima->setName('Ghost of Tsushima')
            ->setPlatform($platformPS5)
            ->setPreservationState($veryGood)
            ->setEdition($standardEdition)
            ->setVersion($palVersion)
            ->setBuyingPrice(6999)
            ->setBuyingDate(DateTime::createFromFormat(self::DATE_FORMAT, '29/07/2022'));
        $this->entityManager->persist($ghostOfTsushima);

        $adminUser = new User();
        $adminUser->setEmail('arthvrmichel@icloud.com')
            ->setPassword($this->passwordHasher->hashPassword($adminUser, 'password'));
        $this->entityManager->persist($adminUser);

        $this->entityManager->flush();
    }
}
