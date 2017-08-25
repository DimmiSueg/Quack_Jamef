<?php
/**
 * Este arquivo é parte do programa Quack Jamef
 *
 * Quack Jamef é um software livre; você pode redistribuí-lo e/ou
 * modificá-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 3 da
 * Licença, ou (na sua opinião) qualquer versão.
 *
 * Este programa é distribuído na esperança de que possa ser útil,
 * mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO
 * a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 * Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU junto
 * com este programa, Se não, veja <http://www.gnu.org/licenses/>.
 *
 * @category   Quack
 * @package    Quack_Jamef
 * @author     Rafael Patro <rafaelpatro@gmail.com>
 * @copyright  Copyright (c) 2017 Rafael Patro (rafaelpatro@gmail.com)
 * @license    http://www.gnu.org/licenses/gpl.txt
 * @link       https://github.com/rafaelpatro/Quack_Jamef
 */

class Quack_Jamef_Model_Request_Time_Response
{
    /**
     * @var Quack_Jamef_Model_Request_Time_Response_Result
     */
    private $JAMW0520_04RESULT;
    
    /**
     * @return Quack_Jamef_Model_Request_Time_Response_Result
     */
    public function getResult()
    {
        return $this->JAMW0520_04RESULT;
    }
    
    /**
     * @return int
     */
    public function getDeliveryTime($date=null)
    {
        Mage::log("Quack_Jamef_Model_Request_Time_Response::getDeliveryTime");
        Mage::log(print_r($this, true));
        $sendDate = $date ? DateTime::createFromFormat('d/m/Y', $date) : new DateTime();
        
        $max = $this->getResult()->getDateMax();
        $maxDate = DateTime::createFromFormat('d/m/y', $max);
        $interval = $maxDate->diff($sendDate);
        $shippingTime = $interval->format('%a');
        return $shippingTime;
    }
}
