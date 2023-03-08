<?php defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Muhanz
 * @license			MIT License
 * @link			https://github.com/hanzzame/ci3-pdf-generator-library
 *
 */

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Pdf
{
	public function create($html,$filename)
    {
	    $dompdf = new Dompdf();
	    $dompdf->loadHtml($html,'UTF-8');
		$dompdf->setPaper(array(0,0,612,935.433), 'portrait');
	    $dompdf->render();
	    $dompdf->stream($filename.'.pdf',array( 'Attachment'=>false ));
        exit(0);
    }
}
?>