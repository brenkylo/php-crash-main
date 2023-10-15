<?php include 'include/header.php'; ?>

<?php 
/** TEST
$feedback = [
  [
    'id' => 1,
    'name' => 'bren',
    'email' => 'bren@gmail.com',
    'FeedB' => 'POGI NYA'
  ],
  [
    'id' => 2,
    'name' => 'Kylo',
    'email' => 'kylo@gmail.com',
    'FeedB' => 'POGI MO DIN'
  ],
  [
    'id' => 3,
    'name' => 'Camma',
    'email' => 'camma@gmail.com',
    'FeedB' => 'POGI MO NYO'
  ]
];
*/
  
  //FETCHING DATA FROM DATABASE
  $sql = 'SELECT * FROM feedbacks';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
   
    <h2>Feedback</h2>
    
    <!--Check if no feedback-->
    <?php if(empty($feedback)): ?><!--When Dealing withing HTML or Templates better to use this Method endif-->
      <p class="lead mt3">There is no Feedback</p>
    <?php endif; ?>

  <?php foreach($feedback as $item):?>  <!--LOOP trough an multiarray or in per column-->
    <div class="card my-3 w-75">
     <div class="card-body text-center">
       <?php echo $item['body'];?>
      <div class="text-secondary mt-2">
       By: <?php echo $item['name'];?> on <?php echo $item['date'];?>
      </div>
     </div>
   </div>
  <?php endforeach; ?>
   

   <?php include 'include/footer.php'; ?>