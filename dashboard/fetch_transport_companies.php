<?php
// Query to fetch all transport companies
$query = "SELECT * FROM transport_companies ORDER BY id DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $no = 0;
    while ($row = $result->fetch_assoc()) {
        $no++;
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['company_name']; ?></td>
            <td><?php echo $row['owner_name']; ?></td>
            <td><?php echo $row['contact_email']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td>
                <?php if (!empty($row['company_logo'])) { ?>
                    <img src="../uploads/Transport/<?php echo $row['company_logo']; ?>" alt="Logo" style="width: 50px; height: 50px;">
                <?php } else { ?>
                    <span>No Logo</span>
                <?php } ?>
            </td>
            <td>
                <?php if (!empty($row['company_certificate'])) { ?>
                    <a href="../uploads/Transport/<?php echo $row['company_certificate']; ?>" target="_blank" class="btn btn-primary">View Certificate</a>
                <?php } else { ?>
                    <span>No Certificate</span>
                <?php } ?>
            </td>
            <td>
                <button class="btn btn-info view-more" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#transportModal">View More</button>
                <a href="update_transport_status.php?id=<?php echo $row['id']; ?>&active=1" class="btn btn-success">Approve</a>
                <a href="update_transport_status.php?id=<?php echo $row['id']; ?>&active=2" class="btn btn-danger">Reject</a>
            </td>
            <td>
                <?php
                if ($row['active'] == 0) {
                    echo '<span class="badge badge-warning">Pending</span>';
                } elseif ($row['active'] == 1) {
                    echo '<span class="badge badge-success">Approved</span>';
                } elseif ($row['active'] == 2) {
                    echo '<span class="badge badge-danger">Rejected</span>';
                }
                ?>
            </td>
        </tr>
        <?php
    }
} else {
    echo '<tr><td colspan="8">No transport companies found.</td></tr>';
}
?>
