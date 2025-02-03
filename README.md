# CSV Import

This guide provides instructions on how to import a CSV file and handle various scenarios during the import process.
<a href="./tutorial.webm">
<img src="./Screenshot 2025-02-03 203418.png" alt="Watch the video">
</a>

## Watch above video

## Instructions

1. **CSV Header Position Changes**:

    - The CSV file can have headers in any order. The data will be inserted correctly based on the header names.

2. **Required Fields**:

    - The following fields are required: `Certificate Name`, `Course Code`, and `Name`.
    - If any of these fields are missing in the CSV file, an error will be generated, and the execution will stop.

3. **Optional Fields**:

    - If some fields are not present in the CSV file and they are not required, the import process will complete successfully.
    - After execution, the system will return a count of the inserted items and an ignore list of fields that were not present in the CSV file.

4. **Duplicate Headers**:

    - If the same header is present more than once in the CSV file, the system will ignore the data from the second occurrence of the header and only use the data from the first occurrence.

5. **Variable Substitution**:

    - The system will generate an insert query using variable substitution and use this query in a loop to insert the data into the table.

6. **Data Dictionary**:
    - A data dictionary will be used to check all the above validations and ensure proper data is inserted into the table.

## Handling

-   **CSV Header Position Changes**: Handled
-   **Required Fields**: Handled
-   **Optional Fields**: Handled
-   **Duplicate Headers**: Handled
-   **Variable Substitution**: Handled
-   **Data Dictionary**: Handled
