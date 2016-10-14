<?php

namespace Tests\Magium\Twitter;

use Magium\AbstractTestCase;
use Magium\Twitter\Actions\AuthenticateTwitter;
use Magium\Twitter\Actions\Tweet;

class TweetTest extends AbstractTestCase
{

    public function testTweet()
    {
        $text = 'TEST TWEET: I am a ' . $this->getRandomWord() . ' with a ' . $this->getRandomWord() . ' who loves ' . $this->getRandomWord();

        $this->getAction(AuthenticateTwitter::ACTION)->execute();
        $this->getAction(Tweet::ACTION)->tweet($text);
    }

    protected function getRandomWord()
    {
        $words = explode("\n", $this->theWords());
        return $words[array_rand($words)];
    }

    protected function theWords()
    {

        return <<<WORDS

abatement
abatements
abater
abaters
abates
abatic
abating
abatis
abatised
abatises
abatjour
abatjours
abaton
abator
abators
abattage
abattis
abattised
abattises
abatement
abatements
abater
abaters
abates
abatic
abating
abatis
abatised
abatises
abatjour
abatjours
abaton
abator
abators
abattage
abattis
abattised
abattises
abatement
abatements
abater
abaters
abates
abatic
abating
abatis
abatised
abatises
abatjour
abatjours
abaton
abator
abators
abattage
abattis
abattised
abattises
abatement
abatements
abater
abaters
abates
abatic
abating
abatis
abatised
abatises
abatjour
abatjours
abaton
abator
abators
abattage
abattis
abattised
abattises
rotations
rotative
rotatively
rotativism
rotatodentate
rotatoplane
rotator
rotatores
rotatoria
rotatorian
rotators
rotatory
rotavist
rotch
rotche
rotches
rote
rotella
rotenone
rotenones
roter
rotes
rotge
rotgut
rotguts
rother
rothermuck
rothesay
roti
rotifer
rotifera
rotiferal
rotiferan
rotiferous
rotifers
rotiform
rotisserie
rotisseries
rotl
rotls
roto
rotocraft
rotodyne
rotograph
rotogravure
unabatingly
unabbreviated
unabdicated
unabdicating
unabdicative
unabducted
unabetted
unabettedness
unabetting
unabhorred
unabhorrently
unabiding
unabidingly
unabidingness
unability
unabject
unabjective
unabjectly
unabjectness
unabjuratory
unabjured
unablative
unable
unableness
unably
unabnegated
unabnegating
unabolishable
unabolished
unaborted
unabortive
unabortively
unabortiveness
unabraded
unabrased
unabrasive
unabrasively
unabridgable
unabridged
unabrogable
unabrogated
unabrogative
unabrupt
unabruptly
unabscessed
WORDS;


    }

}