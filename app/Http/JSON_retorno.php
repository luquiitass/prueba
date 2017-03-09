<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 27/09/16
 * Time: 11:26
 */

namespace App\Http;

use Request;

class JSON_retorno
{
    private $allJSON = array();

    public static function create()
    {
        return new JSON_retorno();
    }

    /**
     * @param string $mensaje
     * @return $this
     */
    public function setMensaje($mensaje,$tipo,$permanente = 'false')
    {
        $this->allJSON[]=array('mensaje'=>$mensaje,'tipo_mensaje'=>$tipo,'permanente'=>$permanente);
        return $this;
    }


    /**
     * @param string $html
     * @return $this
     */
    public function setHtml($id,$html)
    {
        $this->allJSON[]=array('id_content'=>$id,'html'=>$html);
        return $this;
    }


    /**
     * @param string $html_append
     */
    public function setHtmlAppend($id,$html_append)
    {
        $this->allJSON[] = array('id_content'=>$id,'html_append'=>$html_append);

    }


    /**
     * @param string $fadeOut
     * @return $this
     */
    public function setFadeOut($id)
    {
        $this->allJSON[] = array('id_content'=>$id,'fadeOut'=>true);
        return $this;
    }


    /**
     * @param string $html_remplace
     * @return $this
     */
    public function setHtmlRemplace($id,$html_remplace)
    {
        $this->allJSON[] = array('id_content'=>$id,'html_remplace'=>$html_remplace);
        return $this;
    }

    /**
     * @param array $tab_activo
     */
    public function setTabActivo($tab_activo)
    {
        $this->allJSON[] = array('tab_activo'=>$tab_activo);

    }

    /**
     * @param string $desactivar_tabs
     * @return $this
     */
    public function setDesactivarTabs()
    {
        $this->allJSON[] = array('desactivar_tabs'=>'true');
        return $this;
    }

    public function setSelectElement($id)
    {
        $this->allJSON[]= array('id_content'=>$id,'selectElement'=>'true');
        return $this;
    }

    public function setUrl($url=null){
        if (is_null($url))
        {
            $this->allJSON[] = array('url'=>\URL::previous());
        }

        $this->allJSON[] =array('url'=>url($url));
        return $this;
    }

    public function setLimpiarForm($id){
        $this->allJSON[] = array('limpiar_form'=>$id);
        return $this;
    }

    public function setOcultarModal(){
        $this->allJSON[] = array('hide_modal'=>'true');
        return $this;
    }


    public function getAllJSON(){
         return json_encode($this->allJSON);
    }

}