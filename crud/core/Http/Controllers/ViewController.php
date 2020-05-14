<?php
namespace Core\Http\Controllers;
class ViewController
{
    protected static  $validPages =[
        'new'=>'Registrar empleado',
        'refresh'=>'Actualizar empleado',
        'home'=>'Lista de empleados',
    ];

    protected $fallbackPage ='home';
    /**
     * @var string
     */
    private $basepath = 'core/Views';

    /**
     * @var mixed
     */
    private $requestedPage;

    public function __construct()
    {
        if(!isset($_GET['page']) || empty($_GET['page']) || !array_key_exists($_GET['page'],self::$validPages))
        {
            self::redirectToHomePage();
        }
    }

    public function call():void
    {
        $this->setRequestedPage();
        $this->loadPage();
    }

    protected function loadPage():void
    {
        $path =_rootpath($this->basepath.'/'.$this->requestedPage.".php");

        if(!file_exists($path) && empty($this->requestedPage)){
            $path = str_replace($this->requestedPage,$this->fallbackPage,$path);
        }
        include "$path";
    }


    public static function redirectToHomePage():void{
        header('Location: ?page=home');
        exit();
    }

    protected function setRequestedPage():void
    {
        $this->requestedPage = $_GET['page'];

    }

    public static function pageTitle():string
    {
        return self::$validPages[$_GET['page']];
    }

}