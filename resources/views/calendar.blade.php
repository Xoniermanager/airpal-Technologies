<div class="calen-table">
    <h2>July 2024</h2>
    <div class="calen-header">
        <button class="btn bten-pre">Previous Month</button>
        <button class="btn btn-cur">Current Month</button>
        <button class="btn btn-nex">Next Month</button>
    </div>
    <table class="table table-bordered" id="appointment-request">
        <tr>
            <th class="header">Sun</th>
            <th class="header">Mon</th>
            <th class="header">Tue</th>
            <th class="header">Wed</th>
            <th class="header">Thu</th>
            <th class="header">Fri</th>
            <th class="header">Sat</th>
        </tr>
        <tr>
            <?php
            $first_day_of_month = mktime(0, 0, 0, $month, 1, $year);
            $number_of_days = date('t', $first_day_of_month);
            $day_of_week = date('w', $first_day_of_month) - 1;

            // Display empty cells for days before the first day of the month
            for ($i = 0; $i <= $day_of_week; $i++) {
                echo '<td class="empty"></td>';
            }

            // Display each day of the month
            for ($day = 1; $day <= $number_of_days; $day++) {
                $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                $is_booked = in_array($date, $bookings);

                // Customize cell based on booking status
                if ($is_booked) {
                    echo '<td><button class="btn not-btn"><h4>' . $day . '</h4> Already Booked</button></td>';
                } else {
                    echo '<td><button onclick="check_available_slot(this, \'' . $slot_div_id . '\')" type="button" class="btn avail-btn" selected_date="' . $date . '"><h4>' . $day . '</h4><span class="av">Availability</span></button></td>';
                }

                // Start a new row after Saturday
                if (date('w', mktime(0, 0, 0, $month, $day, $year)) == 6) {
                    echo '</tr><tr>';
                }
            }

            // Fill remaining cells in the last row with empty cells
            $remaining_days = 6 - date('w', mktime(0, 0, 0, $month, $number_of_days, $year));
            for ($i = 0; $i < $remaining_days; $i++) {
                echo '<td class="empty"></td>';
            }
            ?>
        </tr>
    </table>
</div>
