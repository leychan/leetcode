<?php

require __DIR__ . '/TreeNode.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        $result = [];

        if ($root == null) {
            return $result;
        }

        //这是用于存储每一层的节点的
        $list = [$root];
        //每一层的层级
        $level = 0;
        //如果当前层级的节点数不为0;则循环取出当前层级的节点的值,
        //并且将当前层级节点的子节点保存到list,用作下一层级的循环
        while ($len = count($list)) {
            //当前层级节点数;防止后续孩子节点也被一次性弹出
            for ($i = 0; $i < $len; $i++) {
                //弹出当前层级的节点
                $node = array_pop($list);
                //当前层级的节点值
                $result[$level][] = $node->val;
                //当前节点的左孩子
                if ($node->left != null) {
                    array_unshift($list, $node->left);
                }
                //当前节点的右孩子
                if ($node->right != null) {
                    array_unshift($list, $node->right);
                }
            }
            //层级++
            $level++;
        }
        return $result;
    }
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->left->left = new TreeNode(3);

print_r((new Solution())->levelOrder($root));