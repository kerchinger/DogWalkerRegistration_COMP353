<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Walker</title>
    <style type="text/css">
    textarea {
      display: block;
      width: 100%;
    }
    </style>
  </head>
  <body>
    <form action="reserve_middle.php" method="post">
      <div><label for="walking_date">Walking Date:
        <select name="walking_date">
          <option value=""></option>
            <?php foreach ($sched as $s1): ?>
                <option value="<?= $s1['date']; ?>"><?= $s1['date']; ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div><label for="walking_timeslot">Timeslot:
          <select name="walking_timeslot">
            <option value=""></option>
              <?php foreach ($sched2 as $s2): ?>
                  <option value="<?= $s2['time']; ?>"><?= $s2['time']; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div><label for="dog">Dog:
            <select name="dog">
              <option value=""></option>
                <?php foreach ($doggy as $dog): ?>
                    <option value="<?= $dog['dog_Name']; ?>"><?= $dog['dog_Name']; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
              <div><input type="submit" name="submitReservation" value="reserve"></div>
    </form>
  </body>
</html>
