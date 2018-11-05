<?php
namespace App\Test\TestCase\View\Helper;
//path

use App\View\Helper\ProgressHelper;
//la classe à tester


use Cake\TestSuite\TestCase;
//le cas de test extends

use Cake\View\View;
//la vue à créer

class ProgressHelperTest extends TestCase
{
     /*
     * TestCase::setUp() fait un certain nombre de choses comme 
     * fabriquer les valeurs dans Core\Configure 
     * et stocker les chemins dans Core\App.
     */
      //Cette méthode est appelée avant chaque méthode 
      //de test dans une classe de cas de test.
    public function setUp(){   
            parent::setUp();
            
            $View = new View();
            
            $this->Progress = new ProgressHelper($View);
    }
    

    /*
     * utilisons assertions pour nous assurer
     *  que notre code crée la sortie que nous attendons:
     */
    public function testBar() {
        //$var =90;
        $result = $this->Progress->bar(90);
        
        $this->assertContains('width: 90%', $result);
        $this->assertContains('progress-bar', $result);
        
       // $result = $this->Progress->bar(33.3333333);
      // $this->assertContains('width: 33%', $result);

    }
    
    
}