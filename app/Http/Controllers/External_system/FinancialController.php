<?php

namespace App\Http\Controllers\External_system;

use App\Http\Controllers\Controller;
use App\Model\Config\ExternalSystem;
use Illuminate\Support\Facades\Http;

class FinancialController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param ExternalSystem $externalSystem
     * @return void
     */
    public function __invoke(ExternalSystem $externalSystem)
    {
        $externalSystem = $externalSystem->Where('path', 'financial')->Where('state_id', 1)->first();

        if(!$externalSystem) {
            abort(404);
        }

        $urlWsEstadoCuenta = $this->urlWsEstadoCuenta($externalSystem->parameters["entidad"], auth()->user()->document);

        $url = $this->url($externalSystem);

        $response = Http::get($url.$urlWsEstadoCuenta);
        $dataUser = simplexml_load_string($response);

        if($dataUser->email == '' OR $dataUser->email == '0' OR $dataUser->email == 'false') {
            session()->flash('error', 'Error al ingresar');
            return back();
        }

        $url = $externalSystem->parameters['dominioProtocolo'].'://'.$externalSystem->parameters['dominio'].'/atencion/Default.aspx';

//        Http::asForm()->post($url, [
//            'pIdentificacion' => auth()->user()->document,
//            'pClave' => (string)$dataUser->clavesinencriptar,
//        ]);

        ?>

        <form name="formulario" action="<?php echo $url ?>" method="post">
            <input type="hidden" name="pIdentificacion" value="<?php echo auth()->user()->document ?>"/>
            <input type="hidden" name="pClave" value="<?php echo $dataUser->clavesinencriptar; ?>"/>
        </form>
        <script>document.formulario.submit();</script>

        <?php

    }

    /**
     * Get the url.
     *
     * @return string
     */
    public function url($AuthFinancial)
    {
        $protocol = $this->protocol(
            $AuthFinancial->parameters["ip"],
            $AuthFinancial->parameters["protocolo"],
            $AuthFinancial->parameters["puerto"]
        );

        return $protocol;

    }

    /**
     * Get the url protocol.
     *
     * @return string
     */
    public function protocol($ip, $protocolo, $puerto)
    {
        return $protocolo.'://'.$ip.':'.$puerto;
    }

    /**
     * Get the url data.
     *
     * @return string
     */
    public function urlWsEstadoCuenta($entidad, $document)
    {
        return "/WebServices/WSEstadoCuenta.asmx/ConsultarDatoBasicosPersona?pEntidad=".$entidad."&pIdentificador=".$document."&pTipo=Identificacion";
    }
}
