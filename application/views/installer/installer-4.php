<div class="row">
    <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); min-height:900px;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <section class="panel" style="margin-top:90px;padding:50px; 
            box-shadow: 4px 12px 85px rgba(0,0,0,.9);
            border: 1px solid #ccc;
            border-radius: 10px;
            ">
                <div class="panel-body" style="background-image:url('<?php echo base_url('img/world.png'); ?>'); 
                  background-repeat:no-repeat; min-height:400px;">
                   <?php if (isset($errors)) {?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
                        </button> <i class="fa fa-ban-circle"></i><strong>Oh Dear!</strong> 
                        <?php echo $errors; ?>
                    </div>
                    <?php } ?>
                  
                    <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('installer/save_time_local',$atts); ?>
                    
                     <img src="<?php echo base_url("img/ig.png"); ?>" class="img-responsive my-center" style="position:relative;">
                    
                           <div class="col-sm-6">
                            
                           </div>
                           <div class="col-sm-6">
                                 
                                 <div class="form-group">
                                  <label>Time Local:</label>
                                   <select name="time" class="form-control m-b">
                                    <option>    Pacific/Midway        </option>
                                    <option>    US/Samoa            </option>
                                    <option>    US/Hawaii           </option>
                                    <option>    US/Alaska           </option>
                                    <option>    US/Pacific          </option>
                                    <option>    America/Tijuana     </option>
                                    <option>    US/Arizona          </option>
                                    <option>    US/Mountain         </option>
                                    <option>    America/Chihuahua   </option>
                                    <option>    America/Mazatlan    </option>
                                    <option>    America/Mexico_City </option>
                                    <option>    America/Monterrey   </option>
                                    <option>    Canada/Saskatchewan </option>
                                    <option>    US/Central          </option>
                                    <option>    US/Eastern          </option>
                                    <option>    US/East-Indiana     </option>
                                    <option>    America/Bogota      </option>
                                    <option>    America/Lima        </option>
                                    <option>    America/Caracas     </option>
                                    <option>    Canada/Atlantic     </option>
                                    <option>    America/La_Paz      </option>
                                    <option>    America/Santiago    </option>
                                    <option>    Canada/Newfoundland </option>
                                    <option>    America/Buenos_Aires</option>
                                    <option>    Greenland           </option>
                                    <option>    Atlantic/Stanley    </option>
                                    <option>    Atlantic/Azores     </option>
                                    <option>    Atlantic/Cape_Verde </option>
                                    <option>    Africa/Casablanca   </option>
                                    <option>    Europe/Dublin       </option>
                                    <option>    Europe/Lisbon       </option>
                                    <option>    Europe/London       </option>
                                    <option>    Africa/Monrovia     </option>
                                    <option>    Europe/Amsterdam    </option>
                                    <option>    Europe/Belgrade     </option>
                                    <option>    Europe/Berlin       </option>
                                    <option>    Europe/Bratislava   </option>
                                    <option>    Europe/Brussels     </option>
                                    <option>    Europe/Budapest     </option>
                                    <option>    Europe/Copenhagen   </option>
                                    <option>    Europe/Ljubljana    </option>
                                    <option>    Europe/Madrid       </option>
                                    <option>    Europe/Paris        </option>
                                    <option>    Europe/Prague       </option>
                                    <option>    Europe/Rome         </option>
                                    <option>    Europe/Sarajevo     </option>
                                    <option>    Europe/Skopje       </option>
                                    <option>    Europe/Stockholm    </option>
                                    <option>    Europe/Vienna       </option>
                                    <option>    Europe/Warsaw       </option>
                                    <option>    Europe/Zagreb       </option>
                                    <option>    Europe/Athens       </option>
                                    <option>    Europe/Bucharest    </option>
                                    <option>    Africa/Cairo        </option>
                                    <option>    Africa/Harare       </option>
                                    <option>    Europe/Helsinki     </option>
                                    <option>    Europe/Istanbul     </option>
                                    <option>    Asia/Jerusalem      </option>
                                    <option>    Europe/Kiev         </option>
                                    <option>    Europe/Minsk        </option>
                                    <option>    Europe/Riga         </option>
                                    <option>    Europe/Sofia        </option>
                                    <option>    Europe/Tallinn      </option>
                                    <option>    Europe/Vilnius      </option>
                                    <option>    Asia/Baghdad        </option>
                                    <option>    Asia/Kuwait         </option>
                                    <option>    Africa/Nairobi      </option>
                                    <option>    Asia/Riyadh         </option>
                                    <option>    Asia/Tehran         </option>
                                    <option>    Europe/Moscow       </option>
                                    <option>    Asia/Baku           </option>
                                    <option>    Europe/Volgograd    </option>
                                    <option>    Asia/Muscat         </option>
                                    <option>    Asia/Tbilisi        </option>
                                    <option>    Asia/Yerevan        </option>
                                    <option>    Asia/Kabul          </option>
                                    <option>    Asia/Karachi        </option>
                                    <option>    Asia/Tashkent       </option>
                                    <option>    Asia/Kolkata        </option>
                                    <option>    Asia/Kathmandu      </option>
                                    <option>    Asia/Yekaterinburg  </option>
                                    <option>    Asia/Almaty         </option>
                                    <option>    Asia/Dhaka          </option>
                                    <option>    Asia/Novosibirsk    </option>
                                    <option>    Asia/Bangkok        </option>
                                    <option>    Asia/Jakarta        </option>
                                    <option>    Asia/Krasnoyarsk    </option>
                                    <option>    Asia/Chongqing      </option>
                                    <option>    Asia/Hong_Kong      </option>
                                    <option>    Asia/Kuala_Lumpur   </option>
                                    <option>    Australia/Perth     </option>
                                    <option>    Asia/Singapore      </option>
                                    <option>    Asia/Taipei         </option>
                                    <option>    Asia/Ulaanbaatar    </option>
                                    <option>    Asia/Urumqi         </option>
                                    <option>    Asia/Irkutsk        </option>
                                    <option>    Asia/Seoul          </option>
                                    <option>    Asia/Tokyo          </option>
                                    <option>    Australia/Adelaide  </option>
                                    <option>    Australia/Darwin    </option>
                                    <option>    Asia/Yakutsk        </option>
                                    <option>    Australia/Brisbane  </option>
                                    <option>    Australia/Canberra  </option>
                                    <option>    Pacific/Guam        </option>
                                    <option>    Australia/Hobart    </option>
                                    <option>    Australia/Melbourne </option>
                                    <option>    Pacific/Port_Moresby</option>
                                    <option>    Australia/Sydney    </option>
                                    <option>    Asia/Vladivostok    </option>
                                    <option>    Asia/Magadan        </option>
                                    <option>    Pacific/Auckland    </option>
                                    <option>    Pacific/Fiji        </option>

                                  </select>
                                </div>

                                <button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>Save</strong></button>
                                <?php echo form_close();  ?>
                           </div>   
                           
                       </div>
                   
                   
                </div>
            </section>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

