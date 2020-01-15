package leetcode

func MajorityElement(nums []int) int {
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
