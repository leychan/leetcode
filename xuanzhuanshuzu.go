package leetcode

func rotate(nums []int, k int) []int {
	num := nums[len(nums) - 1]
	for i := 1; i < k; i++ {
		nums = nums[i:]
		nums = append(nums, num)
		num = nums[len(nums) - 1]
	}
	return nums
}

func majorityElement(nums []int) int {
	result := 0
	count_flag := 0
	for _, num := range nums {
		if count_flag == 0 {
			result = num
		}
		if result == num {
			count_flag++
		} else {
			count_flag--
		}

	}
	return result
}