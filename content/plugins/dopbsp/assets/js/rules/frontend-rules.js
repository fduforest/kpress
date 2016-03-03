
/*
* Title                   : Pinpoint Booking System WordPress Plugin (PRO)
* Version                 : 2.1.2
* File                    : assets/js/rules/frontend-rules.js
* File Version            : 1.0
* Created / Last Modified : 08 November 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Frontend end rules JavaScript class.
*/

var DOPBSPFrontEndRules = new function(){
    'use strict';
    
    /*
     * Private variables.
     */
    var $ = jQuery.noConflict();
    
    /*
     * Constructor
     */
    this.__construct = function(){
    };
     
    /*
     * Get the maximum stay of days/hours set in the rules.
     * 
     * @param ID (Number): calendar ID
     * 
     * @return maximum time lapse value
     */           
    this.getMaxTimeLapse = function(ID){
        var dataRules = DOPBSPFrontEnd.calendar[ID]['rules']['data'];
        
        return dataRules['id'] !== '0'? parseFloat(dataRules['rule']['time_lapse_max']):0;
    };
    
    /*
     * Get the minimum stay of days/hours set in the rules.
     * 
     * @param ID (Number): calendar ID
     * 
     * @return minimum time lapse value
     */ 
    this.getMinTimeLapse = function(ID){   
        var dataDays = DOPBSPFrontEnd.calendar[ID]['days']['data'],
        dataHours = DOPBSPFrontEnd.calendar[ID]['hours']['data'],
        dataRules = DOPBSPFrontEnd.calendar[ID]['rules']['data'];

        return dataRules['id'] !== '0' 
                    && (!dataHours['enabled'] && dataDays['multipleSelect']
                            || dataHours['enabled'] && dataDays['multipleSelect']) ? parseFloat(dataRules['rule']['time_lapse_min']):0;
    };
    
    return this.__construct();
};