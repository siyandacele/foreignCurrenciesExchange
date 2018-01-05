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
                              <td class="m_overflow280 " style="font-size:32px; line-height:36px;padding:0 0 0 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-weight:bold;color:#444444;max-width:510px;overflow:hidden;text-overflow:ellipsis">Before we <span style="color:#0083d4;">get started...</span>

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
                          <td class="m_h3 " align="left" valign="bottom" style="padding:0 0 40px 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-size:22px;line-height:26px;color:#444444">Please take a second to make sure we’ve got your email right.<br><span style="color:#666;font-size:14px;line-height:10px"> If you received this by mistake or weren't expecting it, please disregard this email.</span></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td class="m_w280 m_pl20 m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                      <tr>
                        <td class="m_plr0" align="center" style="padding:0 35px 0 35px">
                          <a href="#"
                            style="text-decoration:none;display:block">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" style="padding:14px 20px 14px 20px;background-color:#49a902;border-radius:4px">
                                  <a class="m_overflow280" href="{{ baseUrl }}{{ urlFor('activate') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}"
                                    style="font-family:helvetica neue,helvetica,arial,sans-serif;font-weight:bold;font-size:18px;line-height:22px;color:#ffffff;text-decoration:none;display:block;text-align:center;;max-width:400px;overflow:hidden;text-overflow:ellipsis">Confirm your email</a>
                                </td>
                              </tr>
                            </table>
                          </a>
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