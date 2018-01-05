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
                              <td class="m_overflow280 " style="font-size:32px; line-height:36px;padding:0 0 0 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-weight:bold;color:#444444;max-width:510px;overflow:hidden;text-overflow:ellipsis">Hi {% if user.name %}{{ user.name }}{% endif %}, <span style="color:#0083d4;">your password was updated</span>

                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td class="m_w280 m_pl20 m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                      <tr>
                          <td class="m_h3 " align="left" valign="bottom" style="padding:0 0 40px 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-size:18px;line-height:22px;color:#444444">Your password was changed.</td>
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