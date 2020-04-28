<?php
namespace OCA\GrafanaDelAmor\Controller;
use OCA\GrafanaDelAmor\Storage;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {
	private $userId;

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		
		$fichier = getContent('questions.txt');
		
$total = 0;
$ressource = fopen ($fichier, "r");
$contenu = fread ($ressource, filesize ($fichier));
fclose ($ressource);
$tableau = explode("\r\n", $contenu);
$longueurs = array();
foreach($tableau as $ligne)
{
    $total = strlen($ligne)+$total;
}
$nb = count($tableau);
		$tableau =array('total'=> $total);

		return new TemplateResponse('grafanadelamor', 'index',$tableau);  // templates/index.php
	}
	public function GetFile($file){
		
	}
}
