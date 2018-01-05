{% extends 'email/templates/default.php' %}
{% block content %}
   <table class="m_bg_white" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#f7f7f7;">
    <tr>
      <td width="580" align="center" style="">
        <table class="m_w320" width="580" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
          <tr>
            <td width="580" align="center" style="padding-bottom:50px">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
                <tr>
                  <td class="m_w280 m_pl20 m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                      <tr>
                        <td class="m_pb25" align="left" valign="bottom" style="padding:0 0 35px 0">
                          <table class="m_w280" width="400">
                            <tr>
                              <td class="m_overflow280 " style="font-size:24px; line-height:36px;padding:0 0 0 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-weight:bold;color:#444444;max-width:510px;overflow:hidden;text-overflow:ellipsis">Hi {% if auth.first_name %}{{ auth.first_name }}{% endif %}, <span style="color:#0083d4;">You have purchased an amount of {{ amount }} ({{ currency }}) the details of the operation are mentioned below</span>

                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td class="m_w280 m_pl20 m_pr20" width="580" align="left" style="padding:0 30px 0 30px;background-color:#ffffff; text-align:left!important;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                      <tr>
                          <td>
                              <table cellpadding='5' cellspacing='5'>		
                                  <tr>
                                      <th>Currency</th>
                                      <td>{{ currency }}</td>
                                  </tr>
                                  <tr>
                                      <th>Exchange Rate</th>
                                      <td>{{ rate }} ({{ currency }})</td>
                                  </tr>
                                  <tr>
                                      <th>Amount</th>
                                       <td>{{ amount }} (ZAR)</td>
                                  </tr>
                                  <tr>
                                      <th>Surcharge Percentage</th>
                                      <td>{{ surcharge }}%</td>
                                  </tr>
                                  <tr>
                                      <th>Currency Purchased</th>
                                      <td>{{ rateAmount }} ({{ currency }})</td>
                                  </tr>
                                  <tr>
                                      <th>Amount of surcharge</th>
                                      <td>{{ surchargeAmount }} (ZAR)</td>
                                  </tr>
                                  
                                  <tr>
                                      <th>Total Amount</th>
                                      <td>{{ totalAmount }} (ZAR)</td>
                                  </tr>

                                  <tr>
                                      <th>Date Created</th>
                                      <td>{{ date }}</td>
                                  </tr>
                            </table>
                          </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  {% endblock %} 