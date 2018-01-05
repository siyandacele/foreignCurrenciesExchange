{% extends 'templates/default.php' %} 
{% block title %}Orders{% endblock %}
{% block content %}
<h1>Orders</h1>
<table class="table table-sm">
    <thead class="thead-inverse small">
      <tr>
        <th>Operation</th>
        <th>Currency</th>
        <th>Rate</th>
        <th>Surcharge</th>
        <th>Amount</th>
        <th>Calculated Amount</th>
        <th>Surcharge Amount</th>
        <th>Total Amount</th>
        <th>Final Amount</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    {% if orders %}
    {% for order in orders %}
      <tr>
        <td><span class="badge {% if orders %}badge-primary{% else %}badge-info{% endif %}">{{ order.operation }}</span></td>
        <td>{{ order.currency }}</td>
        <td>{{ order.rate }}</td>
        <td>{{ order.surcharge }}%</td>
        <td>{{ order.amount }} (ZAR)</td>
        <td>{{ order.calculated_amount }} ({{ order.currency }})</td>
        <td>{{ order.surcharge_amount }} ({{ order.currency }})</td>
        <td>{{ order.total_surcharged_amount }} ({{ order.currency }})</td>
        <td>{{ order.final_amount }} ({{ order.currency }})</td>
        <td><span class="badge badge-default">{{ order.created_at }}</span></td> 
      </tr>
         {% endfor %}
        {% else %}
        <tr>
            <td colspan="10" rowspan="2" class="text-center"><div class="alert alert-info">You haven't made any orders yet :)</div></td>
        </tr>
    {% endif %}
    </tbody>
  </table>
{% endblock %}