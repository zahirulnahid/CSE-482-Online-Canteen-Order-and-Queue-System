<?php
include('../connection.php');
include('../protection.php');

if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $sql = "SELECT * FROM `food_list` WHERE Item_Name LIKE '%$search%' OR id ='$search'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      ?>
      <div
        class="card text-center shadow-xl rounded-xl bg-slate-50 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
        <img src="<?php echo $row['Image_url']; ?>" alt="Menu Item" class="rounded-t-lg mx-auto">
        <div class="p-10 ">
          <h2 class="text-xl font-raleway mb-2">
            <?php echo $row['Item_Name']; ?>
          </h2>
          <p class="text-gray-700 sm:min-h-min container">
            <?php echo $row['Description']; ?>
          </p>
          <p class="text-pink-500 font-semibold mt-4">
            <?php echo $row['Price']; ?> BDT
          </p>
          <div class="flex items-center mt-4">
            <button onClick="addtocart('<?php echo $row['id']; ?>')"
              class="bg-pink-500 text-center mx-auto hover:bg-pink-600 hover:transition duration-200 ease-in-out text-white font-raleway py-2 px-4 rounded mt-4">Add
              to Cart</button>
          </div>
        </div>
      </div>
      <?php
    }
  } else {
    echo "<center>No food Found</center>";
  }
}
$conn->close();
  ?>
